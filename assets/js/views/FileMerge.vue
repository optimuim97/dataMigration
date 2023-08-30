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
              <h1>Fusion</h1>
            </div>

            <div class="section-body">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <h4>Old</h4>
                    <!-- <pre>
                      {{ oldData }}
                    </pre> -->
                    <div v-for="item in oldData" :key="item">
                      <input
                        type="text"
                        class="form-control mb-2"
                        :value="item"
                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <h4>New</h4>
                    <div v-for="item in mergeData" :key="item">
                      <input
                        type="text"
                        class="form-control mb-2"
                        :value="item"
                      />
                    </div>
                  </div>
                </div>
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
import ListContent from "../views/contents/ListContent.vue";

export default {
  data() {
    return {
      oldData: null,
      mergeData: null,
      profilid: 211495,
      listData: {
        id_MerchantProfil: null,
        profilid: null,
        subMerchantId: null,
        outlet: null,
        tpeidentifiant: null,
        MerchantCategoryCode: null,
        nom_complet: null,
        MerchantBusinessName: null,
        MerchantCity: null,
        MerchantCountryCode: null,
        suffixVpan: null,
        vpan: null,
        MerchantEmail: null,
        MerchantPhone: null,
        MerchantRegistre: null,
        marchantRegistreCommercePhoto: null,
        MerchantAdresse: null,
        MerchantLogo: null,
        datecreate: null,
        formejuridique: null,
        status: null,
        mvv: null,
        status_compensation: null,
        taux_compensation: null,
        agent: null,
        partenaire: null,
        type_permis: null,
        immatriculation: null,
        licence: null,
        carte_grise: null,
        assurance: null,
        printed: null,
        slug: null,
        taux_orange: null,
        taux_mtn: null,
        taux_moov: null,
        taux_wave: null,
        taux_bicici: null,
        taux_tpe: null,
        description: null,
        paye_vite: null,
        verified: null,
        pay_fees: null,
        pay_tip: null,
        bicici_boutique: null,
        link_facebook: null,
        link_instagram: null,
        link_whatsapp: null,
        limit_min: null,
        limit_max: null,
        link_site: null,
        link_youtube: null,
        link_twitter: null,
        send_sms: null,
        show_collect: null,
        loyalty_card: null,
        nbre_points: null,
        blacklister: null,
        cadeauoffert: null,
        memo: null,
        montantrequis: null,
        codeconnexion: null,
        merchantTerminal: null,
        mode_paiement: null,
        succursale: null,
        liencallback: null,
        lienredirection: null,
        activer_duree_lien: null,
        montantfixe: null,
        page_custom: null,
        mrch_number_fnce: null,
        mrch_town: null,
        mrch_neighborhood: null,
        mrch_gps: null,
        mrch_dfe: null,
        mrch_ci_pme: null,
        mrch_employee_number: null,
        mrch_interior_photo: null,
        mrch_exterior_photo: null,
        mrch_bank: null,
        mrch_has_public_personality: null,
        mrch_business_abbr: null,
        mrch_indice_surcursale_etranger: null,
        mrch_business_chiffre_aff_ecoule: null,
        mrch_business_size: null,
        mrch_number_sales_points: null,
        mrch_nb_transcation_average_by_month: null,
        mrch_chiffre_aff: null,
        mrch_civility: null,
        mrch_local_type: null,
        mrch_schedule_start: null,
        mrch_schedule_day_start: null,
        mrch_transcation_volume_by_month: null,
        mrch_chiff_aff_by_month: null,
        mrch_number_client_by_day: null,
        merge_is_completed: null,
        createdAt: null,
        merge_at: null,
      },
    };
  },
  components: {
    Navbar,
    Sidebar,
    Footer,
    ListContent,
  },
  methods: {
    getMergeData() {
      axios
        .get("api/v1/merge-manage", { params: { profil_id: 211495 } })
        .then((res) => {
          this.mergeData = res.data.merge;
          this.oldData = res.data.old;

          // if(res.status == 200){
          this.fileLists = res.data.data;
          // }
        })
        .catch((e) => {
          console.log(e?.response);
        });
    },
  },
  created() {
    this.getMergeData();
  },
};
</script>

<style lang="scss" scoped></style>
