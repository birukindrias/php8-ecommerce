<section class="flex  w-full  px-96 h-screen   py-36 flex-col 

                    items-center  justify-center
               bg-slate-500  ">

    <!-- register -->
    <div class=" w-full  md:inset-0 h-modal md:h-full justify-center items-center">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Post product</h3>
                    <form class="space-y-6" action="/create" method="POST" enctype="multipart/form-data">
                        <div>
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product Name
                            </label>
                            <input type="pname" name="pname" id="pname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="john doe" required="">
                        </div>
                        <div>
                            <label for="price"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product
                                price</label>
                            <input type="price" name="price" id="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="588" required="">
                        </div>
                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product
                                description</label>
                            <input type="description" name="description" id="description" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required="">
                        </div>

                        <div class="mb-6 flex flex-col justify-between">
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Choose product
                                photo</label><br>


                            <input type="file" name="file" value=<?= $product->pimage ?> class="block w-full text-sm text-slate-500
      file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-100
    " />
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Post
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>



</section>