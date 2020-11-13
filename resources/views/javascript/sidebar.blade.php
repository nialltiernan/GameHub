<script>
    function hideSideBar(sidebar) {
        sidebar.hide();
        $('#hideSideBarButton').hide();
        $('#showSideBarButton').show();
    }

    function showSideBar(sidebar) {
        sidebar.show()
        $('#showSideBarButton').hide()
        $('#hideSideBarButton').show()

    }

    function toggleSidebarVisibility(){
        let sidebar = $('#sidebar');

        if (sidebar.is(':visible')) {
            hideSideBar(sidebar);
        } else {
            showSideBar(sidebar);
        }
    }
</script>
