<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-3 bg-[#004B23] border border-transparent rounded-full font-bold text-sm text-white uppercase tracking-widest hover:bg-[#00301A] focus:bg-[#00301A] active:bg-[#002010] focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg']) }}>
    {{ $slot }}
</button>
