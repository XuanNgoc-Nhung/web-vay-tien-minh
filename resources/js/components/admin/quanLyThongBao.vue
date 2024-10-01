<template>
    <el-row
        :gutter="24"
        v-loading.fullscreen.lock="loading.status" class="row">
        <el-col :sm="8" :md="4">
            <label>Từ ngày</label>
            <el-date-picker
                v-model="dataSearch.tuNgay"
                type="date"
                format="dd/MM/yyyy"
                value-format="yyyy-MM-dd "
                placeholder="Chọn ngày">
            </el-date-picker>
        </el-col>
        <el-col :sm="8" :md="4">
            <label>Đến ngày</label>
            <el-date-picker
                v-model="dataSearch.denNgay"
                type="date"
                format="dd/MM/yyyy"
                value-format="yyyy-MM-dd"
                placeholder="Chọn ngày">
            </el-date-picker>
        </el-col>
        <el-col :sm="8" :md="8">
            <label style="color: transparent" class="d-block">Tìm kiếm</label>
            <el-button type="success" @click.prevent="getData(1)">Tìm kiếm
            </el-button>
            <el-button type="primary" @click.prevent="getData(2)">Xuất excel
            </el-button>
        </el-col>
        <el-col :span="24" style="padding-top:10px">
            <div class="card">
                <div class="card-header">
                    <el-row :gutter="24">
                        <el-col :span="12">
                            <h5 class="card-title">Danh sách khoản vay</h5></el-col>

                    </el-row>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table-bordered table hover-table">
                            <thead class="thead-light">
                            <tr>
                                <th>STT</th>
                                <th>Tài khoản</th>
                                <th>Hành động</th>
                                <th>Thời gian</th>
                            </tr>
                            </thead>
                            <tbody v-if="list_data&&list_data.length">
                            <tr v-for="(item,index) in list_data" :key="index">
                                <td class="text-center">{{ index + 1 }}</td>
                                <td class="text-center">{{ item.account }}</td>
                                <td class="">{{ item.action }}</td>
                                <td class="">{{ item.created_at }}</td>
                            </tr>
                            </tbody>
                            <tbody v-else>
                            <tr>
                                <td colspan="10" class="text-center">
                                    <p>Không có dữ liệu</p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <PhanTrang v-show="paging.total>0" :tongbanghi="paging.total"
                                   :batdau="trangbatdau"
                                   @pageChange="layLai($event)">
                        </PhanTrang>
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
import * as XLSX from 'xlsx';
import {saveAs} from 'file-saver';
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
            list_data_export: [],
            loading: {
                status: false,
                text: 'Loading...'
            },
            dataSearch: {
                tuNgay: '',
                denNgay: '',
                key: '',
                type: 1
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
        this.getData(1);
    },
    methods: {
        getData2() {
            console.log('getData2')

            const jsonData = [
                {Name: 'John', Age: 30},
                {Name: 'Jane', Age: 25},
            ];

            const worksheet = XLSX.utils.json_to_sheet(this.list_data_export);

            const columnWidths = [{wch: 5},
                {wch: 5},
                {wch: 30},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
                {wch: 20},
            ]; // Chiều rộng của cột A và B
            worksheet['!cols'] = columnWidths;
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

            const excelBuffer = XLSX.write(workbook, {bookType: 'xlsx', type: 'array'});
            const data = new Blob([excelBuffer], {type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'});

            saveAs(data, 'excel_file.xlsx');
        },
        updateStatus(item, status) {
            let params = {
                id: item.id,
                trang_thai: status,
            }
            this.loading.status = true;
            this.loading.text = 'Loading...'
            this.list_data = [];

            rest_api.post('/admin/cap-nhat-trang-thai-yeu-cau-vay', params).then(
                response => {
                    if (response.data.rc == 0) {
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
            let e = 1;
            console.log('getData')
            let params = {
                tuNgay: this.dataSearch.tuNgay,
                denNgay: this.dataSearch.denNgay,
                start: this.paging.start,
                limit: this.paging.limit,
            }
            this.loading.status = true;
            this.loading.text = 'Loading...'
            this.list_data = [];
            rest_api.post('/admin/danh-sach-thong-bao', params).then(
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
