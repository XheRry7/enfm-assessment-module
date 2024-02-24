<template>
    <div class="row">
        <div class="col-12 mb-2 text-end">
            <router-link :to="{ name: 'unitAdd' }" class="btn btn-primary"
                >Create</router-link
            >
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Units</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>unitCode</th>
                                    <th>UnitType</th>
                                    <th>Parent Id</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="units.length > 0">
                                <tr v-for="(unit, key) in units" :key="key">
                                    <td>{{ unit.id }}</td>
                                    <td>{{ unit.unitCode }}</td>
                                    <td>{{ unit.unitType }}</td>
                                    <td>{{ unit.parentId }}</td>
                                    <td>
                                        <router-link
                                            :to="{
                                                name: 'unitEdit',
                                                params: { id: unit.id },
                                            }"
                                            class="btn btn-success m-1"
                                            >Edit</router-link
                                        >
                                        <button
                                            type="button"
                                            @click="deleteUnit(unit.id)"
                                            class="btn btn-danger m-1"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="5" align="center">
                                        No Units Found.
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
    name: "units",
    data() {
        return {
            units: [],
        };
    },
    mounted() {
        this.getUnit();
    },
    methods: {
        async getUnit() {
            await this.axios
                .get("/api/unit")
                .then((response) => {
                    this.units = response.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.unit = [];
                });
        },
        deleteUnit(id) {
            if (confirm("Are you sure to delete this unit ?")) {
                this.axios
                    .delete("/api/unit/" + id)
                    .then((response) => {
                        this.getUnit();
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
