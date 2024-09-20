<template>
    <div id="admin-panel">
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action py-2 ripple">
                        <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>dashbord</span>
                    </a>
                </div>
            </div>
        </nav>
        <main style="margin-left: 240px;">
            <div class="container-fluid mt-4">
                <slot></slot>
            </div>
        </main>
    </div>
</template>

<script setup>
</script>

<style scoped>
#admin-panel {
    display: flex;
}
#sidebarMenu {
    width: 240px;
}
main {
    flex-grow: 1;
}
</style>
