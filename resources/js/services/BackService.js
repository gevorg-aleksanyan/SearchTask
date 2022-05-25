export default {
    async  getProduct(page){
        return await  axios.get('/api/getProduct?page=' + page)
    },
    async  searchProduct(data){
        return await  axios.post("/api/searchProduct", data)
    },
}
