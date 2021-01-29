import Index from './components/index'
import CreateProvider from "./components/provider/CreateProvider";
import ListProvider from "./components/provider/ListProvider";
import ShowProvider from "./components/provider/ShowProvider";
import CreateServiceProvision from "./components/serviceProvision/CreateServiceProvision";
import ListServiceProvision from "./components/serviceProvision/ListServiceProvision";

const routes = [
    { path: '/', name:'Index', component: Index },
    { path: '/provider', name:'ListProvider', component: ListProvider },
    { path: '/provider/view/:id', name:'ShowProvider', component: ShowProvider },
    { path: '/provider/add', name:'CreateProvider', component: CreateProvider },

    { path: '/serviceProvision/add', name:'CreateServiceProvision', component: CreateServiceProvision },
    { path: '/serviceProvision/', name:'ListServiceProvision', component: ListServiceProvision },

];

export default routes;
