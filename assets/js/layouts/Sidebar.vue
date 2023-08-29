<template>
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Data Import</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Tableau de Bord</li>
        <li class="dropdown">
          <!-- <a href="#" class="nav-link"
            ><i class="fas fa-fire"></i><span>Historique</span></a
          > -->
          <ul class="dropdown-menu">
            <li>
              <a class="nav-link" href="index-0.html">General Dashboard</a>
            </li>
            <!-- <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li> -->
          </ul>
        </li>
        <li class="menu-header"></li>

        <li>
          <router-link to="fileList" class="nav-link"
            ><i class="fas fa-pencil-ruler"></i>
            <span> Liste des Fichiers </span></router-link
          >
        </li>
        <li>
          <router-link to="fileMerge" class="nav-link"
            ><i class="fas fa-pencil-alt"></i>
            <span> Fusions de données </span>
          </router-link>
        </li>


        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <router-link to="dash" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> 
            Importer 
          </router-link>
        </div>
      </ul>
    </aside>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped></style>
