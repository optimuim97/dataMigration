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
              <h1>Liste des fichiers</h1>
            </div>

            <div class="row">
              <div
                class="section-body d-flex justify-content-lg-start col-md-5"
              >
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <!-- <th scope="col">#</th> -->
                      <th scope="col">Nom</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="item in fileLists" :key="item.id">
                      <!-- <th scope="row">{{ key }}</th> -->
                      <td>{{ item.name }}</td>
                      <td>{{ item.status }}</td>
                      <td>
                        <a class="fa fa-eye" @click="getFileResult(item.id)"></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="col-md-7">
                <section class="section" v-if="displayResult == true">

                  <h2>
                    {{  filename }}
                  </h2>


                  <div class="row">
                    <!-- 
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <d class="card-icon bg-success">
                            <id class="fas fa-circle"></id>
                            </d/api/get-error-uploader-file/${id}iv>
                            <div class="card-wrap"> if(res.status==200){
                                
                                
                            <div class="card-header">
                                <h4>Total</h4>
                            </div>
                            <div class="card-body">
                                {{ total }}
                            </div>
                            </div>
                        </div>
                        </div> 
                    -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                          <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Enregistré</h4>
                          </div>
                          <div class="card-body">
                            {{ success_count?.length ?? "0" }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                          <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Existant</h4>
                          </div>
                          <div class="card-body">
                            {{ existing_count?.length }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                          <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Erreur</h4>
                          </div>
                          <div class="card-body">
                            {{ error_count?.length }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
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

export default {
  components: { Navbar, Sidebar, Footer },
  data() {
    return {
      fileLists: "",
      success_count: "",
      existing_count: "",
      error_count: "",
      displayResult : false,
      filename : ""
    };
  },
  methods: {
    getfile() {
      axios
        .get("/api/v1/file-list")
        .then((res) => {
          console.log(res);

          // if(res.status == 200){
          this.fileLists = res.data.data;
          // }
        })
        .catch((e) => {});
    },
    getFileResult(id) {
      axios
        .get(`/api/v1/get-error-uploader-file/${id}`)
        .then((res) => {
          console.log(res)

          this.displayResult = true;

          if (res.status == 200) {
            this.success_count = res.data.data?.success;
            this.error_count = res.data.data?.errors;
            this.existing_count = res.data.data?.existing;
            this.filename = res.data.data.fileData.name
          }
        })
        .catch((e) => {});
    },
  },
  created() {
    this.getfile();
  },
};
</script>

<style scoped></style>
