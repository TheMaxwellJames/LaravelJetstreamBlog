<nav class="flex items-center justify-between flex-wrap bg-black p-3 fixed w-full z-10 top-0 pin-t">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
            <span class="text-2xl pl-2 font-semibold"><i class="em em-grinning"></i> Logo</span>
        </a>
    </div>

<!--hamburger-->
<div class="block lg:hidden">
<button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-white hover:border-white">
  <svg class="fill-current mb-2 font-medium leading-tight text-2xl w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
</button>
</div>

<div class="w-full flex-grow  lg:items-center lg:w-auto hidden lg:block pt-6 lg:pt-0" id="nav-content">
<ul class="list-reset lg:flex justify-end flex-1 items-center">
            <li class="mr-6">
                <a class="inline-block py-2 px-2 text-white no-underline hover:text-blue-300" href="#">Home</a>
            </li>
            <li class="mr-6">
                <a class="inline-block text-white no-underline hover:text-blue-300 hover:text-underline py-2 px-2" href="#">About</a>
            </li>
            <li class="mr-6">
                <a class="inline-block text-white no-underline hover:text-blue-300 hover:text-underline py-2 px-2" href="#">Services</a>
            </li>
            <li class="mr-6">
                <a class="inline-block text-white no-underline hover:text-blue-300 hover:text-underline py-2 px-2" href="#">Contact</a>
            </li>
            <li class="mr-6">
                <a class="inline-block text-white no-underline hover:text-blue-300 hover:text-underline py-2 px-2" href="{{ route('login') }}">Login</a>
            </li>
           <li class="mr-6">
                <a class="inline-block text-white no-underline hover:text-blue-300 hover:text-underline py-2 px-2" href="{{ route('register') }}">Register</a>
            </li>
        </ul>
    </div>
</nav>

<script>
    //Javascript to toggle the menu
    document.getElementById('nav-toggle').onclick = function(){
        document.getElementById("nav-content").classList.toggle("hidden");
    }
</script>