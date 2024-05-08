<template>
    <div class="bg-light">
        <div class="container-xxl">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" v-for="product in products" :key="product.id"
                        data-wow-delay="0.1s">
                        <div
                            class="causes-item d-flex flex-column bg-white border-top border-5 border-primary rounded-top overflow-hidden h-100">
                            <div class="text-center p-4 pt-0">
                                <div class="d-inline-block bg-primary text-white rounded-bottom fs-5 pb-1 px-3 mb-4">
                                    <small>{{ product.category.name }}</small>
                                </div>
                                <h5 class="mb-3">{{ product.name }}</h5>
                                <p>{{ product.description ? product.description : '-' }}</p>
                                <div class="causes-progress bg-light p-3 pt-2">
                                    <div class="mb-0">
                                        <p class="text-dark content">
                                            Username : <small class="text-body">{{ product.username }}</small><br>
                                            Email : <small class="text-body">{{ product.email }}</small><br>
                                        </p>
                                        <small><a class="text-dark" style="text-decoration:none" href="/admin/apps">lihat password</a></small>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative mt-auto">
                                <img class="img-fluid" :src="getImageUrl(product.photos)" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        products: {
            type: Array,
            required: true
        }
    },
    methods: {
        getImageUrl(filename) {
            return `/storage/${filename}`;
        }
    }
};
</script>

<style scoped>
.content {
    margin-top: 0px;
    margin-bottom: 0px;
}
.fit-content {
    object-fit: contain;
    max-height: 100%;
    width: auto;
}
</style>