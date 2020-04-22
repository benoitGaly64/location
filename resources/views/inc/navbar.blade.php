<!-- Sidebar -->

<div class="bg-light border-right sticky-top" id="sidebar-wrapper">
    <div class="sidebar-heading sticky-top">Mon agence immo</div>
    <div class="list-group list-group-flush sticky-top">
        <a href="/home" class="list-group-item list-group-item-action bg-light sticky-top">Dashboard</a>
        @can('list possessions')
            <a href="/possessions" class="list-group-item list-group-item-action bg-light sticky-top">Mes Biens</a>
        @endcan
    </div>
</div>
<!-- /sidebar-wrapper -->
