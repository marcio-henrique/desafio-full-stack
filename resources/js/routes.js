import Index from './components/index'
import CreateProvider from "./components/provider/CreateProvider";
import ListProvider from "./components/provider/ListProvider";
import ShowProvider from "./components/provider/ShowProvider";

const routes = [
    { path: '/', name:'Index', component: Index },
    { path: '/provider', name:'ListProvider', component: ListProvider },
    { path: '/provider/view/:id', name:'ShowProvider', component: ShowProvider },
    { path: '/provider/add', name:'CreateProvider', component: CreateProvider },

];

export default routes;
