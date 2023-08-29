<template>
  <div>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <Sidebar></Sidebar>
        <Navbar></Navbar>
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Fusion </h1>
            </div>

            <div class="section-body">
              <div class="container"></div>
            </div>
          </section>
        </div>
        <Footer></Footer>
      </div>
    </div>
  </div>
</template>

<script>

import Navbar from "../layouts/Navbar.vue";
import Sidebar from "../layouts/Sidebar.vue";
import Footer from "../layouts/Footer.vue";
import ListContent from "../views/contents/ListContent.vue"

export default {
    components : {
        Navbar,
        Sidebar,
        Footer,
        ListContent
    }
};
</script>

<style lang="scss" scoped></style>
