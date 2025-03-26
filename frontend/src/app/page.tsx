import Typography from '@mui/material/Typography'
import Box from '@mui/material/Box'

export default function HomePage() {
    return (
        <Box sx={{ textAlign: 'center', padding: 5 }}>
            <Typography variant='h4'>Bem-vindo ao Sistema de Gerenciamento</Typography>
            <Typography variant='body1' sx={{ marginTop: 2 }}>
                Use o menu lateral para navegar entre as seções.
            </Typography>
        </Box>
    )
}
