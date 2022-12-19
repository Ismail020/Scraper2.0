<div class="relative inline-block text-left" x-data="{ open: false }">
    <div>
        <button type="button" x-on:click="open = ! open" @click.away="open = false"
            class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100"
            id="menu-button" aria-expanded="true" aria-haspopup="true">
            Most Relevant
        </button>
    </div>

    <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div x-show="open" @click.away="open = false" x-cloak x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95" class="py-1" role="none">
            <a href="#" id="relevant" class="hidden text-gray-700 px-4 py-2 text-sm" role="menuitem"
                tabindex="-1" onclick="funtion('relevant', 'ascending', 'descending')" id="menu-item-1">Most
                Relevant</a>
            <a href="#" id="ascending" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                tabindex="-1" onclick="funtion('ascending', 'descending', 'relevant')" id="menu-item-0">Price
                Ascending</a>
            <a href="#" id="descending" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem"
                tabindex="-1" onclick="funtion('descending', 'ascending', 'relevant')" id="menu-item-1">Price
                Descending</a>

        </div>
    </div>
</div>

<script>
    function funtion(order, order2, order3) {
        var id = document.getElementById(order);
        var id2 = document.getElementById(order2);
        var id3 = document.getElementById(order3);
        var menuButton = document.getElementById("menu-button");

        if (order == 'relevant') {
            id.classList.add('hidden');
            id.classList.add("block");

            id2.classList.remove("bg-gray-100", "text-gray-900");
            id3.classList.remove("bg-gray-100", "text-gray-900");

            menuButton.innerHTML = id.innerHTML;

            var url = new URL(window.location.href);
            url.searchParams.delete('order');
            window.history.pushState({}, document.title, url.href);
            $("#test").load(location.href + " #test");
        } else {
            id.classList.add("bg-gray-100", "text-gray-900");

            id2.classList.remove("bg-gray-100", "text-gray-900");

            menuButton.innerHTML = id.innerHTML;

            id3.classList.remove("hidden");
            id3.classList.add("block");

            var url = new URL(window.location.href);
            var params = new URLSearchParams(url.search);
            params.set('order', order);
            url.search = params.toString();
            var new_url = url.toString();
            window.history.pushState({
                path: new_url
            }, '', new_url);
            $('#test').load(new_url + ' #test');
        }
    }
</script>
