@include('components.RWdashboard')
<main class="p-4 sm:ml-64 mt-10">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
       <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-screen-lg">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text-gray-500 mb-4">New products this week</p>
                <p class="text-blue-600 mt-4">PRODUCTS REPORT</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text-gray-500 mb-4">Visitors this week</p>
                <p class="text-blue-600 mt-4">VISITS REPORT</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text-gray-500 mb-4">User signups this week</p>
                <p class="text-blue-600 mt-4">USERS REPORT</p>
            </div>
       </div>
       <br>
       <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">
             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
             </svg> 
          </p>
       </div>
       
    </div>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
@include('components.footer')
