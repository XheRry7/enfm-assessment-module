<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Unit</h4>
                </div>
                <div class="card-body">
                    <form @submit.prevent="create">
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
                                    Save
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
    name: "add-unit",
    data() {
        return {
            unit: {
                unitCode: "",
                unitType: "",
                parentId: "",
            },
        };
    },
    methods: {
        async create() {
            try {
                const response = await this.axios.post("/api/unit", this.unit);
                this.$router.push({ name: "unitList" });
            } catch (error) {
                console.error("Error:", error);
            }
        },
    },
};
</script>
