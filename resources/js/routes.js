import App from './components/App'
import LandingPage from './components/components/marketing/LandingPage'
import About from './components/components/marketing/About'
import Login from './components/components/auth/Login'
import Register from './components/components/auth/Register'

const routes = [{
        path: '/',
        name: 'home',
        component: LandingPage
    },
    {
        path: '/todo',
        name: 'todo',
        component: App
    },
    {
        path: '/about',
        name: 'about',
        component: About
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/register',
        name: 'register',
        component: Register
    }
]

export default routes