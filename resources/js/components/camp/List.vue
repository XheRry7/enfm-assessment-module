<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to="{ name: 'campAdd' }" class="btn btn-primary"
                >Create</router-link
            >
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Camps</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>company</th>
                                    <th>Camp Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Tel No.</th>
                                    <th>Camp Bos</th>
                                    <th>Email Id</th>
                                    <th>Floors</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="camps.length > 0">
                                <tr v-for="(camp, key) in camps" :key="key">
                                    <td>{{ camp.id }}</td>
                                    <td>{{ camp.company }}</td>
                                    <td>{{ camp.campName }}</td>
                                    <td>{{ camp.address }}</td>
                                    <td>{{ camp.city }}</td>
                                    <td>{{ camp.country }}</td>
                                    <td>{{ camp.telephoneNumber }}</td>
                                    <td>{{ camp.campBoss }}</td>
                                    <td>{{ camp.emailId }}</td>
                                    <td>{{ camp.totalfloors }}</td>
                                    <td>
                                        <router-link
                                            :to="{
                                                name: 'campEdit',
                                                params: { id: camp.id },
                                            }"
                                            class="btn btn-success m-1"
                                            >Edit</router-link
                                        >
                                        <button
                                            type="button"
                                            @click="deleteCamp(camp.id)"
                                            class="btn btn-danger m-1"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="11" align="center">
                                        No Camps Found.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "camps",
    data() {
        return {
            camps: [],
        };
    },
    mounted() {
        this.getCamp();
    },
    methods: {
        async getCamp() {
            await this.axios
                .get("/api/camp")
                .then((response) => {
                    this.camps = response.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.camp = [];
                });
        },
        deleteCamp(id) {
            if (confirm("Are you sure to delete this camp ?")) {
                this.axios
                    .delete("/api/camp/" + id)
                    .then((response) => {
                        this.getCamp();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
