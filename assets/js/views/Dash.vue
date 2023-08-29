<template>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <Sidebar></Sidebar>
      <Navbar></Navbar>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Importation</h1>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-md-4">
                <div class="my-3">
                  <form @submit.prevent="importData">
                    <div class="form-group">
                      <label>Nombre d'éléments à parcourir </label>
                      <input
                        type="number"
                        class="form-control"
                        v-model="form.range"
                      />
                    </div>

                    <div class="form-group">
                      <label>Ajouter votre fichier </label>
                      <input
                        type="file"
                        class="form-control"
                        @change="uploadFile"
                        required
                      />
                    </div>

                    <div class="d-flex justify-content-center">
                      <Loading :isDisplay="isDisplay"></Loading>
                    </div>

                    <button
                      class="btn btn-round bg-primary text-white w-100"
                      v-show="!isDisplay"
                    >
                      <!-- <i class="fas fa-rocket"></i> -->
                      Soumettre
                    </button>
                  </form>
                </div>
              </div>

              <div class="col-md-8">
                <section class="section" v-if="displayResult == true">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                          <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Total</h4>
                          </div>
                          <div class="card-body">
                            {{ total }}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                      <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                          <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                            <h4>Compte Enregistré</h4>
                          </div>
                          <div class="card-body">
                            {{ success_count }}
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
                            <h4>Compte Existant</h4>
                          </div>
                          <div class="card-body">
                            {{ existing_count }}
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
                            <h4 v-if="error_count >= 2">Erreur d'enregistrement</h4>
                          </div>
                          <div class="card-body">
                            {{ error_count }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </section>
      </div>
      <Footer></Footer>
    </div>
  </div>
</template>

<script>
import Navbar from "../layouts/Navbar.vue";
import Sidebar from "../layouts/Sidebar.vue";
import Footer from "../layouts/Footer.vue";
import Loading from '../tools/Loading.vue';

export default {
  components: { Navbar, Sidebar, Footer, Loading },
  data() {
    return {
      displayResult: false,
      total: null,
      success_count: null,
      error_count: null,
      existing_count: null,
      elapsed: null,
      form: {
        excel_file: null,
        range: 10,
      },
      isDisplay: false
    };
  },
  methods: {
    importData() {
      this.isDisplay = true;

      axios
        .post("api/v1/create-apaympro-multiple", this.form, {
          headers: { "Content-Type": "multipart/form-data" },
        })
        .then((res) => {
          console.log(res);
          if (res.status == 200) {
            this.displayResult = true;

            this.total = res.data.total;
            this.success_count = res.data.success_count;
            this.error_count = res.data.error_count;
            this.existing_count = res.data.existing_count;
            this.elapsed = res.data.elapsed;
          } else if (res.status == 401) {
          } else {
          }
        })
        .catch((e) => {
          console.log(e);

          // this.$swal('Une erreur est survenue')
        })
        .finally(() => {
          this.isDisplay = false;
        });
    },
    uploadFile(e) {
      const image = e.target.files[0];
      this.form.excel_file = image;
      const reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = (e) => {
        // this.previewImage = e.target.result;
        // console.log(this.previewImage);
      };
    },
  },
};
</script>

<style lang="css" scoped></style>
