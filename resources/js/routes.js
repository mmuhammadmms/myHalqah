import PeoplesIndex from './components/peoples/Index'
import PeoplesEdit from './components/peoples/Edit'
import PeoplesCreate from './components/peoples/Create'


export const routes = [
    {   path: '/peoples',name: 'PeoplesIndex',component: PeoplesIndex},
    {   path: '/peoples/create',name: 'PeoplesCreate',component: PeoplesCreate},
    {   path: '/peoples/:id',name: 'PeoplesEdit',component: PeoplesEdit }
]