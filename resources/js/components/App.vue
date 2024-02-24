<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <router-link to="/" class="navbar-brand" href="#"
                    >ENFM</router-link
                >

                <div
                    class="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item" exact-active-class="active">
                            <router-link to="/" class="nav-link"
                                >Camp</router-link
                            >
                        </li>
                        <li class="nav-item" exact-active-class="active">
                            <router-link to="/unit" class="nav-link"
                                >Units</router-link
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-5">
            <router-view></router-view>
        </div>
    </main>
</template>

<script>
export default {};
</script>
