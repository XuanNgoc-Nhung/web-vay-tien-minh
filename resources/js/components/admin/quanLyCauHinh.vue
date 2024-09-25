<template>
    <el-row
        :gutter="24"
        v-loading.fullscreen.lock="loading.status" class="row">
        <el-col :span="24" style="padding-top:10px">
            <div class="card">
                <div class="card-header">
                    <el-row :gutter="24">
                        <el-col :span="12">
                            <h5 class="card-title">Cấu hình web</h5></el-col>

                    </el-row>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table-bordered table hover-table">
                            <thead class="thead-light">
                            <tr>
                                <th>Lãi suất cá nhân (‱)</th>
                                <th>Lãi suất doanh nghiệp(‱)</th>
                                <th>CSKH</th>
                                <th>Ngân hàng</th>
                                <th>Số tài khoản</th>
                                <th>Chủ tài khoản</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody v-if="list_data&&list_data.length">
                            <tr v-for="(item,index) in list_data" :key="index">
                                <td class="text-center">
                                    <el-input-number size="mini" :max="10000" :min="0"  :step="1"
                                                     v-model="item.lai_suat_ca_nhan">
                                    </el-input-number>
                                    =
                                    <el-input style="width:150px" disabled :value="parseInt(item.lai_suat_ca_nhan)/100+'%'"> </el-input>
                                </td>
                                <td class="text-center">
                                    <el-input-number size="mini" max="10000" :min="0" :step="1"
                                                     v-model="item.lai_suat_doanh_nghiep">
                                    </el-input-number>
                                    =
                                    <el-input size="mini" style="width:150px" disabled :value="parseInt(item.lai_suat_doanh_nghiep)/100+'%'"> </el-input>
                                </td>
                                <td class="text-center">
                                    <el-input v-model="item.cskh" type='text' size="mini"></el-input>
                                </td>
                                <td class="text-center">
                                    <el-input v-model="item.bank" type='text' size="mini"></el-input>
                                </td>
                                <td class="text-center">
                                    <el-input v-model="item.stk" type='text' size="mini"></el-input>
                                </td>
                                <td class="text-center">
                                    <el-input v-model="item.chu_tk" type='text' size="mini"></el-input>
                                </td>
                                <td class="text-center">
                                    <el-button type="warning" size="mini" @click.prevent="updateLaiSuat(item)">Cập nhật</el-button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </el-col>
    </el-row>
</template>
<script>
import rest_api from "../../api/rest_api";
import Vue from 'vue';
import ElementUI from 'element-ui';
import PhanTrang from "../Ui/phanTrang.vue";
import {
    Icon
} from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/vi'

Vue.use(ElementUI, {locale})
Vue.use(Icon);
export default {
    components: {
        PhanTrang
    },
    data() {
        return {
            list_data: [],
            loading: {
                status: false,
                text: 'Loading...'
            },
            trangbatdau: false,
            paging: {
                total: 0,
                start: 0,
                limit: 10,
                currentPage: 1
            },
        }
    },
    mounted() {
        console.log('Mounted Giao dịch admin...');
        this.getData();
    },
    methods: {
        updateLaiSuat(item) {
            console.log('updateLaiSuat')
            console.log(item)
            this.loading.status = true;
            this.loading.text = 'Loading...'
            this.list_data = [];

            rest_api.post('/admin/cap-nhat-lai-xuat', item).then(
                response => {
                    if (response.data.rc == 0) {
                        this.thongBao('success', 'Cập nhật thành công')
                        this.getData()
                    } else {
                        this.thongBao('error', response.data.rd)
                    }
                    console.log(this.list_data)
                    this.loading.status = false;
                }
            ).catch((e) => {
            })
        },
        layLai(e) {
            console.log('onPagingClick')
            this.paging.start = e.start;
            this.paging.limit = e.limit;
            this.paging.currentPage = e.currentPage;
            this.getData()
        },
        getData() {
            console.log('getData')
            let params = {
                start: this.paging.start,
                limit: this.paging.limit,
                key: '',
            }
            this.loading.status = true;
            this.loading.text = 'Loading...'
            this.list_data = [];

            rest_api.post('/admin/lay-thong-tin-cau-hinh', params).then(
                response => {
                    if (response.data.rc == 0) {
                        this.list_data = response.data.data;
                        this.paging.total = response.data.total
                        this.thongBao('success', 'Lấy dữ liệu thành công')
                    } else {
                        this.thongBao('error', response.data.rd)
                    }
                    console.log(this.list_data)
                    this.loading.status = false;
                }
            ).catch((e) => {
            })
        },
        thongBao(typeNoty, msgNoty) {
            let msg = "";
            let cl = "";
            if (msgNoty) {
                msg = msgNoty;
            }
            let type = "success";
            if (typeNoty) {
                type = typeNoty
            }
            if (type == "success") {
                cl = "dts-noty-success"
            }
            if (type == "warning") {
                cl = "dts-noty-warning"
            }
            if (type == "error") {
                cl = "dts-noty-error"
            }
            if (type == "info") {
                cl = "dts-noty-info"
            }
            this.$message({
                customClass: cl,
                showClose: true,
                message: msg,
                type: type,
                duration: 3000
            });
        },
    }
}

</script>
<style scoped="scoped">
th {
    text-align: center;
}

.el-date-table td {
    border: none !important;
}
</style>
