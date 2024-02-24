<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Camp</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="camp.company"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Camp Name</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="camp.campName"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="camp.address"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>City</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="camp.city"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="camp.country"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Telephone Number</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="camp.telephoneNumber"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Camp Boss</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="camp.campBoss"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email Id</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="camp.emailId"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Total Floors</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="camp.totalfloors"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "update-camp",
    data() {
        return {
            camp: {
                company: "",
                campName: "",
                address: "",
                city: "",
                country: "",
                telephoneNumber: "",
                campBoss: "",
                emailId: "",
                totalfloors: "",
                _method: "patch",
            },
        };
    },
    mounted() {
        this.showCamp();
    },
    methods: {
        async showCamp() {
            await this.axios
                .get("/api/camp/" + this.$route.params.id)
                .then((response) => {
                    const {
                        company,
                        campName,
                        campCode,
                        address,
                        city,
                        country,
                        telephoneNumber,
                        campBoss,
                        emailId,
                        totalfloors,
                    } = response.data;
                    this.camp.company = company;
                    this.camp.campName = campName;
                    this.camp.campCode = campCode;
                    this.camp.address = address;
                    this.camp.city = city;
                    this.camp.country = country;
                    this.camp.telephoneNumber = telephoneNumber;
                    this.camp.campBoss = campBoss;
                    this.camp.emailId = emailId;
                    this.camp.totalfloors = totalfloors;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async update() {
            await this.axios
                .post("/api/camp/" + this.$route.params.id, this.camp)
                .then((response) => {
                    this.$router.push({ name: "campList" });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
