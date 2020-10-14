<template>
    <div class="col-12">
         <table class="table table-bordered" style="color:#fff;">
                <thead>
                    <tr>
                        <th scope="col" width="8%" class="text-center">ลำดับ</th>
                        <th scope="col" width="25%" class="text-center">สมาชิก</th>
                        <th scope="col" width="15%" class="text-center">ยอดแทงที่มี การได้เสีย</th>
                        <th scope="col" width="15%" class="text-center">รายรับ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,i) in items" :key="i">
                        <td class="text-center">{{ i+1 }}</td>
                        <td v-if="item.user_id == user_id" class="pl-3 text-danger">ตัวแทน</td>
                        <td v-else class="pl-3">{{ item.name }}</td>
                        <td><cleave v-model="item.amount" :options="options.number" class="form-control input-number text-right"></cleave></td>
                        <td><cleave v-model="item.revenue" :options="options.number" class="form-control input-number text-right"></cleave></td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="2">Total</td>
                        <td class="text-right pr-3">{{ showTotal('amount') | numeral('0,0.00') }}</td>
                        <td class="text-right pr-3">{{ showTotal('revenue') | numeral('0,0.00') }}</td>
                    </tr>

                </tbody>
            </table>

            <div class="row">
                <div class="col-12">
                    <div class="text-center mt-4">
                        <button type="button" @click="saveData()" class="btn btn-success">บันทึก</button>
                        <a href="/commission" class="btn btn-secondary">ย้อนกลับ</a>
                    </div>
                </div>
            </div>

    </div>
</template>
<script>
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import Cleave from 'vue-cleave-component';
import axios from 'axios'
import VueAxios from 'vue-axios'

export default {
    data (){
        return{
            showModal: false,
            items: [],
            price: '',
            options: {
                number: {
                    numeral: true,
                    signBeforePrefix: true,
                    numeralDecimalScale: 2
                },
            },
        }
    },
    props: ['user_id','date_now'],
    components:{
        Cleave,
        VueAxios,
        axios
    },
    created(){
        this.loadData();
    },
    methods:{
        saveData(){
             Vue.swal({
                title: 'ยืนยันการบันทึก?',
                text: "กรุณาตรวจสอบข้อมูล และยืนยันการบันทึก อีกครั้ง!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก',
            }).then((result) => {
                if (result.value) {

                    axios.post('/commission/save', {
                        user_id: this.user_id,
                        item: this.items
                    })
                    .then(function (response) {
                        Vue.swal({
                            title: "สำเร็จ!",
                            text: 'บันทึก "ค่าคอมมิชชั่น" สำเร็จ',
                            icon: "success",
                        
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = '/commission';
                            }
                        }); 
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

                }
            })
        },
        loadData(){
            axios.get('/commission/get', {
                params: {
                    user_id: this.user_id,
                    date_now: this.date_now
                    }
                })
                .then(response => {

                    if(response.data.status == 200){
                        this.items = response.data.item
                    }else{
                        this.items = []
                    }
            })
        },
        showTotal(type){
            if(type == 'amount'){
                return this.items.reduce((sum, value) => sum + parseFloat(value.amount), 0);
            }else if(type == 'revenue'){
                return this.items.reduce((sum, value) => sum + parseFloat(value.revenue), 0);
            }else{
                return 0;
            }
        }
    }
}
</script>