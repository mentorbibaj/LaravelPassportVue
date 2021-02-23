import App from './components/App'
import LandingPage from './components/components/marketing/LandingPage'
import About from './components/components/marketing/About'
import Login from './components/components/auth/Login'
import Logout from './components/components/auth/Logout'
import Register from './components/components/auth/Register'

const routes = [{
        path: '/',
        name: 'home',
        component: LandingPage
    },
    {
        path: '/todo',
        name: 'todo',
        component: App,
        meta: {
            requiresAuth: true,
        }
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            requiresVisitor: true,
        }
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            requiresVisitor: true,
        }
    },
    {
        path: '/logout',
        name: 'logout',
        component: Logout
    }
]

export default routes