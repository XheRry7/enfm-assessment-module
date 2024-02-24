<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Update Unit</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="update">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Unit Code</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="unit.unitCode"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Unit Type</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="unit.unitType"
                                    />
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Parent Id</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="unit.parentId"
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
    name: "update-unit",
    data() {
        return {
            unit: {
                unitCode: "",
                unitType: "",
                parentId: "",
                _method: "patch",
            },
        };
    },
    mounted() {
        this.showUnit();
    },
    methods: {
        async showUnit() {
            await this.axios
                .get("/api/unit/" + this.$route.params.id)
                .then((response) => {
                    const { unitCode, unitType, parentId } = response.data;
                    this.unit.unitCode = unitCode;
                    this.unit.unitType = unitType;
                    this.unit.parentId = parentId;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async update() {
            await this.axios
                .post("/api/unit/" + this.$route.params.id, this.unit)
                .then((response) => {
                    this.$router.push({ name: "unitList" });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
