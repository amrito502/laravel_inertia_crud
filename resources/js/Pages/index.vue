<script setup>
import { router } from '@inertiajs/vue3';
//   export default {
//     props: {
//       customers: Array,
//     },
//   }

defineProps({ customers: Object })

function destroy(id) {
    router.delete('/customers/' + id)
}

function edit(id) {
    router.get('/customers/' + id + '/edit')
}

function redirectTocreate() {
    router.get('/customers/create');
}

</script>


<template>
    <div>
        <div class="card-header d-flex justify-content-between mt-4 mb-2">
            <h4>All Customers</h4>
            <button class="btn btn-success" @click.prevent="redirectTocreate">Create Customer</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers" :key="customer.id">
                    <td>{{ customer.id }}</td>
                    <td>{{ customer.name }}</td>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.phone }}</td>
                    <td>
                        <button @click.prevent="edit(customer.id)" class="btn btn-sm btn-info mx-2">Edit</button>
                        <button @click.prevent="destroy(customer.id)" class="btn btn-sm btn-danger">delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>



<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    padding: 10px;
    text-align: left;
    border: 1px solid #ddd;
}

th {
    background-color: #f4f4f4;
}
</style>
