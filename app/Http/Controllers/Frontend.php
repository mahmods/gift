<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App;
use Cookie;
use Session;
use Validator;

class Frontend extends Controller
{
	public $cfg;
	public $style;
	public $menu;
	public $footer;
	public $languages;
	public $categories;
	public $cart;

	public function __construct()
	{
		// Check if installed by trying to connect to database
		try {
			DB::connection()->getPdo();
		} catch (\Exception $e) {
			// redirect to the installer
			return redirect('install')->send();
		}
		if(customer("id") == '') {
			session()->forget('customer');
		}
		$this->cfg = \App\Config::first();
		$this->style = \App\Style::first();
		$this->menu = \App\Menu::where('parent',0)->orderby('o','asc')->get();
		$this->footer = \App\Footer::orderby('o','asc')->get();
		$this->languages = \App\Language::orderby('id','asc')->get();
		$this->categories = \App\Category::where('parent',0)->orderby('id','asc')->get();
		$this->currencies = \App\Currency::orderby('default','asc')->get();
		$this->cart = json_decode(stripslashes(Cookie::get('cart')), true);
		$this->cart_options = json_decode(stripslashes(Cookie::get('cart_options')), true);
		//$this->cart = request()->cookie('cart') != null ? json_decode(stripslashes(request()->cookie('cart')),true) : array();
		App::setLocale(Cookie::get('lang'));
	}
	public function header($title = false,$desc = false,$page = false,$landing = false,$bg = false)
	{
		// Update visitors count
		\App\Config::first()->increment('views');
		$visit =  \App\Visitor::where('date',date('Y-m-d'))->count();
		// Update today visitors
		if ($visit > 0)
		{
			\App\Visitor::where('date',date('Y-m-d'))->increment('visits');
		} else {
			\App\Visitor::insert(['date' => date('Y-m-d'),'visits' => '1']);
		}
		// Get user operating system and update the database
		$useros = getOS();
		$os = \App\Os::where('os',$useros)->count();
		if ($os > 0)
		{
			\App\Os::where('os',$useros)->increment('visits');
		} else {
			\App\Os::insert(['os' => $useros,'visits' => '1']);
		}
		// Get visitor browser
		$userbrowser = getBrowser();
		$browser = \App\Browser::where('browser',$userbrowser)->count();
		if ($browser > 0)
		{
			\App\Browser::where('browser',$userbrowser)->increment('visits');
		} else {
			\App\Browser::insert(['browser' => $userbrowser,'visits' => '1']);
		}
		// Get the website where the user came from
		$userreferrer = getReferrer();
		if(empty($userreferrer)){$userreferrer = 'Direct';}
		$referrer =  \App\Referrer::where('referrer',$userreferrer)->count();
		if ($referrer > 0)
		{
			\App\Referrer::where('referrer',$userreferrer)->increment('visits');
		} else {
			\App\Referrer::insert(['referrer' => $userreferrer,'visits' => '1']);
		}
		// Get visitors country
		$usercountry = getCountry();
		if($usercountry){
			\App\Country::where('iso',$usercountry)->increment('visitors');
		}
		// Visitors tracking tool
		if (isset(request()->tracking)){
			$trackingcode = request()->tracking;
			$tracking =  \App\Tracking::where('code',$trackingcode)->count();
			if ($tracking > 0)
			{
				\App\Tracking::where('code',$trackingcode)->increment('clicks');
			}
		}
		$data['lang'] = App::getLocale();
		$data['stripe'] = \App\Payment::where('code','stripe')->first();
		$data['title'] = ($title) ? translate($title).' | '.translate($this->cfg->name) : translate($this->cfg->name);
		$data['desc'] = ($desc) ? $desc : $this->cfg->desc;
		$data['keywords'] = $this->cfg->key;
		$data['style'] = $this->style;
		$data['color'] = explode(',',$this->style->background);
		$data['cfg'] = $this->cfg;
		$data['tp'] = url("/themes/".$this->cfg->theme);
		$data['page'] = $page;
		$data['landing'] = $landing;
		$data['bg'] = $bg;
		$data['menu'] = $this->menu;
		$data['languages'] = $this->languages;
		$data['currencies'] = $this->currencies;
		return view('header')->with($data)->render(); 
	}
	public function footer()
	{
		// An array of social links to use them in the footer
		$social = array();
		if(!empty($this->cfg->facebook)){$social['facebook'] = $this->cfg->facebook;}
		if(!empty($this->cfg->instagram)){$social['instagram'] = $this->cfg->instagram;}
		if(!empty($this->cfg->youtube)){$social['youtube'] = $this->cfg->youtube;}
		if(!empty($this->cfg->twitter)){$social['twitter'] = $this->cfg->twitter;}
		if(!empty($this->cfg->tumblr)){$social['tumblr'] = $this->cfg->tumblr;}
		$links = $this->footer;
		$tp = url("/themes/".$this->cfg->theme);
		$cfg = $this->cfg;
		$lang = App::getLocale();
		return view('footer')->with(compact('social','links', 'tp', 'cfg', 'lang'))->render();
	}
	public function language(Request $request, $language_code)
	{
		//dd($request->redirect);
		// Check if the language exists and redirect the user
		if (\App\Language::where(['code' => escape($language_code)])->count() > 0)
		{
			setcookie('lang', $language_code,time()+31556926,'/');
			App::setLocale($language_code);
		} else {
			return 'Language not found';
		}
		return redirect()->to($request->redirect);
	}
	public function currency($currency_code)
	{
		// Check if the currency exists and redirect the user
		if (\App\Currency::where(['code' => escape($currency_code)])->count() > 0)
		{
			setcookie('currency', $currency_code,time()+31556926,'/');
		} else {
			return 'currency not found';
		}
		return redirect()->to('/');
	}
	public function index()
	{
		$header = $this->header(false,false,false,true);
		$style = $this->style;
		if(preg_match("/(youtube.com)\/(watch)?(\?v=)?(\S+)?/", $this->style->media)){
			// Show video image from youtube
			parse_str(parse_url($this->style->media, PHP_URL_QUERY),$video);
			$media = '<a target="_blank" href="'.$this->style->media.'"><img class="landing-video" src="https://i3.ytimg.com/vi/'.$video['v'].'/mqdefault.jpg"></a>';
		} else {
			// Show image
			$media = '<img class="landing-image" src="'.$this->style->media.'">';
		}
		// Select the page builder blocs from database
		$blocs = \App\Bloc::where(['area' => 'home'])->orderby('o','asc')->get();
		$footer = $this->footer();
		return view('index')->with(compact('header','style','media','blocs','footer'));
	}
	public function cart()
	{
		$header = $this->header(translate('Cart'),false,true);
		$footer = $this->footer();
		$cart_items = $this->cart;
		$count = count($cart_items);
		$products = array();
		if($count > 0){
			// get the product ids
			$ids = "";
			foreach($cart_items as $id=>$name){
				$ids = $ids . $id . ",";
			}
			// remove the last comma
			$ids = rtrim($ids, ',');
			// Get products from database
			$cart_products = \App\Product::whereRaw("id IN ({$ids})")->orderby('id','desc')->get();
			$total_price = 0;
			$total_p = 0;
			foreach ($cart_products as $i => $row){
				$q = $this->cart[$row->id];
				$options = json_decode($this->cart_options[$row->id],true);
				$option_array = array();
				foreach ($options as $option) {
					$option_array[] = '<i>'.$option['title'].'</i> : '.$option['value'];
				}
				$data['id'] = $row->id;
				$data['images'] = image_order($row->images);
				$data['title'] = $row->title;
				$data['price'] = currency($row->price);
				$data['quantity'] = $q;
				$data['options'] = implode('<br/>',$option_array);
				$data['total'] = currency($row->price * $q);
				// Add product to array :
				array_push($products, $data);
				$total_p+= $q;
			}
		}
		return view('cart')->with(compact('header','footer', 'products'));
	}

	public function checkout(Request $request, $step = null)
	{
		$header = $this->header(translate('Cart'),false,true);
		$footer = $this->footer();
		if (!count($this->cart) > 0){
			return redirect("cart");
		}
		if (empty($step)) {
			return redirect("checkout/address");
		}
		$checkout_session = Session::get("checkout");
		switch ($step) {
			case 'address':
				$step = 1;
				if ($request->isMethod("post")) {
					$rules = [
						'first_name' => 'required',
						'last_name' => 'required',
						'address_details' => 'required',
						'phone' => 'required',
						'region' => 'required',
						'city' => 'required',
						];
					$validator = Validator::make($request->all(), $rules)->validate();
					foreach ($request->all() as $key => $value) {
						$request->session()->put('checkout.'.$key, $value);
					}
					return redirect("checkout/gift_cart");
				}
				return view('checkout')->with(compact('header','footer', 'step'));
				break;
			case 'gift_cart':
				$step = 2;
				if ($request->isMethod("post")) {
					$rules = [
						'cart_name' => 'required',
						'cart_message' => 'max:150',
						];
					$validator = Validator::make($request->all(), $rules)->validate();
					foreach ($request->all() as $key => $value) {
						$request->session()->put('checkout.'.$key, $value);
					}
					return redirect("checkout/summary");
				}
				return view('checkout')->with(compact('header','footer', 'step'));
				break;
			case 'summary':
				$step = 3;
				$products = array();
				// get the product ids
				$cart_items = $this->cart;
				$ids = "";
				foreach($cart_items as $id=>$name){
					$ids = $ids . $id . ",";
				}
				// remove the last comma
				$ids = rtrim($ids, ',');
				// Get products from database
				$cart_products = \App\Product::whereRaw("id IN ({$ids})")->orderby('id','desc')->get();
				$total_price = 0;
				$total_p = 0;
				foreach ($cart_products as $i => $row){
					$q = $this->cart[$row->id];
					$options = json_decode($this->cart_options[$row->id],true);
					$option_array = array();
					foreach ($options as $option) {
						$option_array[] = '<i>'.$option['title'].'</i> : '.$option['value'];
					}
					$data['id'] = $row->id;
					$data['images'] = image_order($row->images);
					$data['title'] = $row->title;
					$data['price'] = currency($row->price);
					$data['quantity'] = $q;
					$data['options'] = implode('<br/>',$option_array);
					$data['total'] = currency($row->price * $q);
					// Add product to array :
					array_push($products, $data);
					$total_price += $row->price * $q;
					$total_p+= $q;
				}
				$request->session()->put('checkout.products', json_encode($products,true));
				$request->session()->put('checkout.total', $total_price);
				$total_price = currency($total_price);
				return view('checkout')->with(compact('header','footer', 'step', 'products', 'total_price'));
				break;
			case 'payment':
				$step = 4;
				$cart_items = $this->cart;
				$ids = "";
				foreach($cart_items as $id=>$name){
					$ids = $ids . $id . ",";
				}
				// remove the last comma
				$ids = rtrim($ids, ',');
				// Get products from database
				$cart_products = \App\Product::whereRaw("id IN ({$ids})")->orderby('id','desc')->get();
				$total_price = 0;
				$total_p = 0;
				$total = 0;
				$products = array();
					foreach ($cart_products as $row){
						$q = $this->cart[$row->id];
						$product['id'] = $row->id;
						$product['quantity'] = $q;
						$product['options'] = $this->cart_options[$row->id];
						array_push($products,$product);
						$total += $row->price * $q;
						//$email_products .= '<div>'.$row->title.' x '.$q.'<b style="float:right">'.currency($row->price * $q).'</b></div><hr>';
						// Update product quantity
						\App\Product::where('id',$product['id'])->decrement('quantity',$q);
					}
				// Save order in database
				$data = array();
				$data['products'] = json_encode($products,true);
				$data['customer'] = (session('customer') == '' ? '0' : customer('id'));
				$data['first_name'] = session('checkout.first_name');
				$data['last_name'] = session('checkout.last_name');
				$data['region'] = session('checkout.region');
				$data['city'] = session('checkout.city');
				$data['address_details'] = session('checkout.address_details');
				$data['phone'] = session('checkout.phone');
				$data['summ'] = $total;
				$data['time'] = time();
				$data['date'] = date('Y-m-d');
				$data['stat'] = 1;
				$data['payment'] = '{"payment_status":"unpaid"}';
				$order = DB::table('orders')->insertGetId($data);
				$methods = \App\Payment::where('active',1)->orderby('id','asc')->get();
				$response = array();
				//$response[] = '<div class="payment_total"><div>Sub total <b>'.currency($sub_total).'</b></div>'.$coupon_response.$shipping_response.'<div>Total <b>'.currency($total).'</b></div></div><div class="payments">';
				$error = null;
				$success = null;
				foreach($methods as $method){
					// Get method options and include it 
					$options = json_decode(stripslashes($method->options), true);
					include app_path()."/Payments/".$method->code."/checkout.php";
				}
				return view('checkout')->with(compact('header','footer', 'step', 'response'));
				break;
			default:
				abort(404);
				break;
		}
	}

	public function register()
	{
		if ($this->cfg->registration == 0 || session('customer') != '') {
			abort('404');
		}
		if(isset(request()->register)){
			if (!empty(request()->gender) && !empty(request()->first_name) && !empty(request()->last_name) && !empty(request()->email) && !empty(request()->password)){
				$data['first_name'] = htmlspecialchars(request()->first_name);
				$data['last_name'] = htmlspecialchars(request()->last_name);
				$data['gender'] = request()->gender == "male" ? 0 : 1;
				$data['email'] = htmlspecialchars(request()->email);
				$data['password'] = md5(request()->password);
				$data['sid'] = md5(microtime().uniqid());
				if(\App\Customer::where(['email' => $data['email']])->count() > 0) {
					$error = 'This email is already registerd !';
				} else {
					$id = \App\Customer::insertGetId($data);
					\App\Address::insert(['customer_id'=> $id]);
					$error = false;
				}
			} else {
				$error = 'All fields are required !';
			}
			
		}
		$header = $this->header(translate('Registration'),false,true);
		$footer = $this->footer();
		return view('register')->with(compact('header','error','footer'));
	}
	public function login()
	{
		if ($this->cfg->registration == 0 || session('customer') != '') {
			abort('404');
		}
		if(isset(request()->login)){
			// Check email and password and redirect to the account
			$data['email'] = htmlspecialchars(request()->email);
			$data['password'] = md5(request()->password);
			if(empty($data['email']) or empty($data['password'])){
				$error = 'All fields are required';
			} else {
				if(\App\Customer::where($data)->count() > 0) {
					// Generate a new secure ID for this session and redirect to dashboard
					$secure_id = md5(microtime().uniqid());
					\App\Customer::where($data)->update(['sid' => $secure_id]);
					session(['customer' => $secure_id]);
					return redirect('account');
				} else {
					$error = 'Wrong email or password';
				}
			}
		}
		$header = $this->header(translate('Login'),false,true);
		$footer = $this->footer();
		return view('login')->with(compact('header','error','footer'))->render(); 
	}
	public function reset_password($token = false)
	{
		if (session('customer') != '') {
			abort('404');
		}
		if(isset(request()->send)){
			$data['email'] = request()->email;
			if(empty($data['email'])){
				$error = 'All fields are required';
			} else {
				if(\App\Customer::where($data)->count() > 0) {
					$customer = \App\Customer::where($data)->first();
					$key = md5(uniqid());
					\App\Password_reset::insert(['customer' => $customer->id,'key' => $key]);
					mailing('reset-password',array('link'=>url('reset-password/'.$key)),'Reset your password',$data['email']);
					$error = false;
				} else {
					$error = 'This account does not exist';
				}
			}
		}
		if($token){
			if(\App\Password_reset::where(['key' => $token])->count() == 0) {
				abort(404);
			}
			$id = \App\Password_reset::where(['key' => $token])->first()->customer;
			if(isset(request()->reset)){
				$pass = md5(request()->password);
				if(empty(request()->password)){
					$error = 'Please insert your new password';
				} else {
					$secure_id = md5(microtime());
					\App\Customer::where(['id' => $id])->update(['sid' => $secure_id,'password' => $pass]);
					\App\Password_reset::where(['customer' => $id])->delete();
					session(['customer' => $secure_id]);
					return redirect('account');
				}
			}
			$header = $this->header('Reset your password',false,true);
			$footer = $this->footer();
			return view('reset-password')->with(compact('header','error','footer'))->render();
		}
		$header = $this->header('Forgot password ?',false,true);
		$footer = $this->footer();
		return view('forgot-password')->with(compact('header','error','footer'))->render(); 
	}
	public function account()
	{
		$header = $this->header(translate('Account'),false,true);
		$orders = \App\Order::where('customer',customer('id'))->orderby('id','desc')->get();
		$customer = \App\Customer::where('id', customer('id'))->first();
		$footer = $this->footer();
		return view('account.index')->with(compact('header','orders','footer', 'customer'))->render(); 
	}
	public function accountEdit(Request $request)
	{
		$customer = \App\Customer::where('id', customer('id'))->first();
		if ($request->isMethod("post")) {
			$rules = [
				'first_name' => 'required',
				'last_name' => 'required',
				'gender' => 'required',
			];

			$validator = Validator::make($request->all(), $rules)->validate();
			$customer->first_name = $request->first_name;
			$customer->last_name = $request->last_name;
			$customer->gender = $request->gender;
			$customer->save();
			return redirect("account");
		}
		$header = $this->header(translate('Account'),false,true);
		$footer = $this->footer();
		return view('account.edit')->with(compact('header','footer', 'customer'))->render(); 
	}

	public function address(Request $request) {
		$customer = \App\Customer::where('id', customer('id'))->first();
		$address = $customer->address;
		if ($request->isMethod("post")) {
			$rules = [
				'first_name' => 'required',
				'last_name' => 'required',
				'phone' => 'required',
				'address_1' => 'required',
				'address_2' => 'required',
				'city' => 'required',
				'region' => 'required',
			];

			$validator = Validator::make($request->all(), $rules)->validate();
			$address->first_name = $request->first_name;
			$address->last_name = $request->last_name;
			$address->phone = $request->phone;
			$address->address_1 = $request->address_1;
			$address->address_2 = $request->address_2;
			$address->city = $request->city;
			$address->region = $request->region;
			$address->save();
			return redirect("account/address");
		}
		$header = $this->header(translate('Addresses'),false,true);
		$footer = $this->footer();
		return view("account.address")->with(compact('header', 'footer', 'address'));
	}

	public function invoice($order_id)
	{
		// Check if the order exists and return order details
		if (\App\Order::where('customer',customer('id'))->where('id',$order_id)->orderby('id','desc')->count() == 0){
			abort(404);
		}
		$order = \App\Order::where('id',$order_id)->first();
		$header = $this->header(translate('Invoice'),false,true);
		$fields = \App\Field::orderby('id','asc')->get();
		$footer = $this->footer();
		return view('invoice')->with(compact('header','order','fields','footer'));
	}
	public function profile()
	{
		if(isset(request()->update)){
			if (!empty(request()->name) && !empty(request()->email)){
				$data['name'] = htmlspecialchars(request()->name);
				$data['email'] = htmlspecialchars(request()->email);
				if (!empty(request()->password)) {
					$data['password'] = md5(request()->password);
				} else {
					$data['password'] = customer('password');
				}
				\App\Customer::where('id',customer('id'))->update($data);
				$error = false;
			} else {
				$error = 'Name and email fields are required !';
			}
		}
		$header = $this->header(translate('Profile'),false,true);
		$footer = $this->footer();
		return view('profile')->with(compact('header','error','footer'));
	}
	public function logout()
	{
		// Clear the customer seesion 
		session(['customer' => '']);
		return redirect('login');
	}
	public function products($category = false)
	{
		$header = $this->header(translate('Products'),false,true);
		// Apply the product filters
		$price = array();
		$where = array();
		if (!empty(request()->min) && !empty(request()->max))
		{
			$where['price'] = "price BETWEEN '".escape(request()->min)."' AND '".escape(request()->max)."'";
		}
		if (!empty(request()->search))
		{
			$where['search'] = "(title LIKE '%".escape(request()->search)."%' OR text LIKE '%".escape(request()->search)."%')";
		}
		if ($category)
		{
			if (\App\Category::where('path',$category)->count() == 0){
				abort(404);
			}
			$category = \App\Category::where('path',$category)->first();
			$categories[] = $category->id;
			if ($category->parent == 0){
				$childs = \App\Category::where('parent',$category->id)->orderby('id','desc')->get();
				foreach ($childs as $child){
					$categories[] = $child->id;
				}
			}
			$where['cat'] = "category IN (".implode(',',$categories).")";
		}
		$where = ($where) ?  implode(' AND ', $where) : '1';
		$cats = $this->categories;
		$products = \App\Product::whereRaw($where)->orderby('id','desc')->get();
		$price['min'] = (count($products) > 0 ? \App\Product::whereRaw($where)->orderby('price','asc')->limit(1)->first()->price : 0);
		$price['max'] = (count($products) > 0 ? \App\Product::whereRaw($where)->orderby('price','desc')->limit(1)->first()->price : 0);
		$footer = $this->footer();
		$tp = url("/themes/".$this->cfg->theme);
		return view('products')->with(compact('header', 'tp','category','price','cats','products','footer'));
	}
	public function product($product_id)
	{
		// Check if product exists and return product details
		if (\App\Product::where('id',explode('-',$product_id)[0])->count() == 0){
			abort(404);
		}
		$product = \App\Product::where('id',explode('-',$product_id)[0])->first();
		$cat = \App\Category::where('id',$product->category)->first();
		$total_ratings = \App\Review::where('active',1)->where('product',$product->id)->count();
		$rating = 0;
		if ($total_ratings > 0){
			$rating_summ = \App\Review::where('active',1)->where('product',$product->id)->sum('rating');
			$rating = $rating_summ / $total_ratings;
		}
		$images = explode(',',$product->images);
		$title = $product->title;
		$desc = mb_substr($product->text,0,75);
		$header = $this->header(translate($title),$desc,true);
		// Select product reviews from the database
		$reviews = \App\Review::where('active',1)->where('product',$product->id)->orderby('time','desc')->get();
		$tp = url("/themes/".$this->cfg->theme);
		$footer = $this->footer();
		return view('product')->with(compact('header','product','cat','rating','total_ratings','images','reviews','tp','footer'));
	}
	public function blog()
	{
		$header = $this->header(translate('Blog'),false,true);
		$posts = \App\Post::orderby('time','desc')->get();
		$footer = $this->footer();
		return view('blog')->with(compact('header','posts','footer'));
	}
	public function post($post_id)
	{
		// Check if blog post exists and return post details
		if (\App\Post::where('id',explode('-',$post_id)[0])->count() == 0){
			abort(404);
		}
		$post = \App\Post::where('id',explode('-',$post_id)[0])->first();
		\App\Post::where('id',$post->id)->increment('visits');
		$title = $post->title;
		$desc = mb_substr($post->content,0,75);
		$header = $this->header(translate($post->title),$desc,false,true,url('/assets/blog/'.$post->images));
		// Get blocs of the page builder
		$blocs = \App\Bloc::where(['area' => 'post'])->orderby('o','asc')->get();
		$footer = $this->footer();
		return view('post')->with(compact('header','post','blocs','footer'));
	}
	public function page($page_id)
	{
		// Check if the page exists and return page title and content
		if (\App\Page::where('path',$page_id)->count() == 0){
			abort(404);
		}
		$page = \App\Page::where('path',$page_id)->first();
		$title = $page->title;
		$desc = mb_substr($page->content,0,75);
		$header = $this->header(translate($title),$desc,true);
		// Get blocs of the page builder
		$blocs = \App\Bloc::where(['area' => 'page'])->orderby('o','asc')->get();
		$footer = $this->footer();
		return view('page')->with(compact('header','page','blocs','footer'));
	}
	public function support()
	{
		if(isset(request()->send)){
			if (!empty(request()->name) && !empty(request()->email) && !empty(request()->subject) && !empty(request()->message)){
				// Escape the user entries and insert them to database
				$data['name'] = htmlspecialchars(request()->name);
				$data['title'] = htmlspecialchars(request()->subject);
				$data['email'] = htmlspecialchars(request()->email);
				$data['message'] = htmlspecialchars(request()->message);
				\App\Ticket::insert($data);
				$sent = true;
			} else {
				$sent = false;
			}
		}
		$header = $this->header(translate('Support'),false,false,true,url('/support/map'));
		$cfg = $this->cfg;
		$footer = $this->footer();
		return view('support')->with(compact('header','sent','cfg','footer'));
	}
	public function map()
	{
		// Return a static map from the Google maps api
		$map = 'http://maps.googleapis.com/maps/api/staticmap?zoom=12&format=png&maptype=roadmap&style=element:geometry|color:0xf5f5f5&style=element:labels.icon|visibility:off&style=element:labels.text.fill|color:0x616161&style=element:labels.text.stroke|color:0xf5f5f5&style=feature:administrative.land_parcel|element:labels.text.fill|color:0xbdbdbd&style=feature:poi|element:geometry|color:0xeeeeee&style=feature:poi|element:labels.text.fill|color:0x757575&style=feature:poi.business|visibility:off&style=feature:poi.park|element:geometry|color:0xe5e5e5&style=feature:poi.park|element:labels.text|visibility:off&style=feature:poi.park|element:labels.text.fill|color:0x9e9e9e&style=feature:road|element:geometry|color:0xffffff&style=feature:road.arterial|element:labels|visibility:off&style=feature:road.arterial|element:labels.text.fill|color:0x757575&style=feature:road.highway|element:geometry|color:0xdadada&style=feature:road.highway|element:labels|visibility:off&style=feature:road.highway|element:labels.text.fill|color:0x616161&style=feature:road.local|visibility:off&style=feature:road.local|element:labels.text.fill|color:0x9e9e9e&style=feature:transit.line|element:geometry|color:0xe5e5e5&style=feature:transit.station|element:geometry|color:0xeeeeee&style=feature:water|element:geometry|color:0xc9c9c9&style=feature:water|element:labels.text.fill|color:0x9e9e9e&size=640x250&scale=4&center='.urlencode(trim(preg_replace('/\s\s+/', ' ', $this->cfg->address)));
		$con = curl_init($map);
		curl_setopt($con, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($con, CURLOPT_HEADER, 0);
		curl_setopt($con, CURLOPT_RETURNTRANSFER, 1);
		return response(curl_exec($con))->header('Content-Type', 'image/png');
	}
	public function success()
	{
		$header = $this->header(translate('Success'),false,false,true);
		// remove cart products after the successfull payment
		setcookie('cart', '',time()+31536000,'/');
		$tp = url("/themes/".$this->cfg->theme);
		$footer = $this->footer();
		return view('success')->with(compact('header','footer'));
	}
	public function failed()
	{
		$header = $this->header(translate('Failed'),false,false,true);
		$footer = $this->footer();
		return view('failed')->with(compact('header','footer'));
	}
}
