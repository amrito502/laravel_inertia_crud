<script setup>
import { useForm } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';


defineProps({
    errors:Object
});


const form = useForm({
    name:null,
    email:null,
    phone:null,
});


function submit(){
    router.post('/customers',form)
}

function redirectToIndex() {
    router.get('/customers');
}
</script>


<template>
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card mt-5">
                <div class="card-header d-flex justify-content-between">
                    <h4>Create Customer</h4>
                   <button class="btn btn-success" @click.prevent="redirectToIndex">Customers</button>
                </div>
                <form @submit.prevent="submit">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" v-model="form.name" name="name" id="name" class="form-control mt-2" placeholder=" Enter name">
                            <span class="text-danger text-xs" v-if="errors.name">{{ errors.name }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" v-model="form.email" name="email" id="email" class="form-control mt-2" placeholder=" Enter email">
                            <span class="text-danger text-xs" v-if="errors.email">{{ errors.email }}</span>
                        </div>
                        <div class="form-group">
                            <label for="name">Phone</label>
                            <input type="text" v-model="form.phone" name="phone" id="phone" class="form-control mt-2" placeholder=" Enter phone">
                            <span class="text-danger text-xs" v-if="errors.phone">{{ errors.phone }}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
