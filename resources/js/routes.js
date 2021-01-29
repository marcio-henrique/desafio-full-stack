import Index from './components/index'
import CreateProvider from "./components/provider/CreateProvider";
import ListProvider from "./components/provider/ListProvider";

const routes = [
        { path: '/', component: Index },
        { path: '/provider', component: ListProvider },
        { path: '/provider/add', component: CreateProvider },


    ];

export default routes;
