<!-- Navigation Links -->
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
    </x-nav-link>

    <!-- Hanya tampil untuk role Admin -->
    @role('admin')
        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            {{ __('Admin Panel') }}
        </x-nav-link>
    @endrole

    <!-- Hanya tampil untuk role Dosen -->
    @role('dosen')
        <x-nav-link :href="route('dosen.dashboard')" :active="request()->routeIs('dosen.dashboard')">
            {{ __('Dashboard Dosen') }}
        </x-nav-link>
    @endrole

    <!-- Tampil untuk yang punya izin 'lihat progres' (Admin dan Dosen) -->
    @can('lihat progres')
        <x-nav-link :href="route('laporan.progres')" :active="request()->routeIs('laporan.progres')">
            {{ __('Lihat Progres') }}
        </x-nav-link>
    @endcan
</div>
