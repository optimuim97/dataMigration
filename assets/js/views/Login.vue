<script>
import Token from "../utils/Token";
import AppStorage from "../utils/AppStorage";

export default {
  data() {
    return {
      form: {
        username: "",
        password: "",
      },
    };
  },
  methods: {
    submitLoginForm() {
      let username = this.form.username;
      this.form.username = this.form.username?.toLowerCase();

      const LoginUser = async () => {
        // this.$loading(true);

        await axios
          .post("auth", this.form)
          .then((res) => {
            if (res.status == 200) {
              const access_token = res.data.token;

              console.log(access_token);

              if (Token.isValid(access_token, username)) {
                //Store data on localStorage
                AppStorage.storeData(username, access_token);
                // EventBus.$emit("login");
                axios = require("axios");
                const JWTToken = `Bearer ${localStorage.getItem("token")}`;
                axios.defaults.headers.common["Authorization"] = JWTToken;

                this.$swal("Bien éffectué", "Vous êtes connecté", "success");

                this.$router.push({ name: "Dash" });
              } else {
                this.$swal("Bien éffectué", "Vous êtes connecté", "success");
              }
            } else {
              this.$swal.info("Une erreur est survenue", "success");
            }
          })
          .catch((error) => {
            // console.log(">>>>>>> Error Login");
            console.log("error");

            if (error.response.status == 401) {
              console.log("401");
              this.$swal(
                "Accès invalides",
                "E-mail ou mot de passe incorrect",
                "error"
              );

              // this.$toast.error("Email ou mot de passe invalide");
            } else if (error.response.status == 400) {
              console.log("400");
              // this.$toast.info("Veuillez renseigner tout les champs svp 😉");
            }
          })
          .finally(() => {
            // this.$loading(false);
          });
      };

      LoginUser();
    },
  },
};
</script>

<template>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div
            class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4"
          >
            <!-- <div class="login-brand">
              <img
                src="assets/img/stisla-fill.svg"
                alt="logo"
                width="100"
                class="shadow-light rounded-circle"
              />
            </div> -->

            <div class="card card-primary">
              <div class="card-header"><h4>Connexion</h4></div>

              <div class="card-body">
                <form
                  class="needs-validation"
                  novalidate=""
                  @submit.prevent="submitLoginForm"
                >
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input
                      id="email"
                      type="email"
                      class="form-control"
                      name="email"
                      tabindex="1"
                      required
                      autofocus
                      v-model="form.username"
                    />
                    <div class="invalid-feedback">Ajouter votre email</div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label"
                        >Mot de passe</label
                      >
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Mot de passe oublié ?
                        </a>
                      </div>
                    </div>
                    <input
                      id="password"
                      type="password"
                      class="form-control"
                      name="password"
                      tabindex="2"
                      required
                      v-model="form.password"
                    />
                    <div class="invalid-feedback">
                      Ajouter votre mot de passe
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input
                        type="checkbox"
                        name="remember"
                        class="custom-control-input"
                        tabindex="3"
                        id="remember-me"
                      />
                      <!-- <label class="custom-control-label" for="remember-me"
                        >Remember Me</label
                      > -->
                    </div>
                  </div>

                  <div class="form-group">
                    <button
                      type="submit"
                      class="btn btn-primary btn-lg btn-block"
                      tabindex="4"
                    >
                      Connexion
                    </button>
                  </div>
                </form>
                <!-- <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div> -->
                <!-- <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>
                  </div>
                </div> -->
              </div>
            </div>
            <!-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> -->
            <div class="simple-footer">
              Copyright &copy; {{ new Date().getFullYear() }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<style lang="css" scoped></style>
