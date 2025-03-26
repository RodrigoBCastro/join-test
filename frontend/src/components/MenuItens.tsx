'use client'

import { useRouter } from 'next/navigation'
import List from '@mui/material/List'
import ListItem from '@mui/material/ListItem'
import ListItemText from '@mui/material/ListItemText'
import ListItemIcon from '@mui/material/ListItemIcon'
// import CategoryIcon from '@mui/icons-material/Category'
// import ShoppingCartIcon from '@mui/icons-material/ShoppingCart'

export default function MenuItens() {
    const router = useRouter()

    return (
        <List>
            <ListItem button onClick={() => router.push('/')}>
                <ListItemIcon>
                </ListItemIcon>
                <ListItemText primary='Home' />
            </ListItem>
            <ListItem button onClick={() => router.push('/categories')}>
                <ListItemIcon>
                </ListItemIcon>
                <ListItemText primary='Categorias' />
            </ListItem>
            <ListItem button onClick={() => router.push('/products')}>
                <ListItemIcon>
                </ListItemIcon>
                <ListItemText primary='Produtos' />
            </ListItem>
        </List>
    )
}
