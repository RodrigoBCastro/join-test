'use client'

import { useState } from 'react'
import Link from 'next/link'
import { useRouter } from 'next/navigation'

// MUI Imports
import Drawer from '@mui/material/Drawer'
import Typography from '@mui/material/Typography'
import Box from '@mui/material/Box'
import Container from '@mui/material/Container'
import MenuItens from "@components/MenuItens";

const SidebarLayout = ({ children }) => {
  const router = useRouter()
  const [open, setOpen] = useState(true)

  return (
      <Box sx={{ display: 'flex', minHeight: '100vh' }}>
          <Drawer
              variant='permanent'
              sx={{
                  width: 240,
                  flexShrink: 0,
                  '& .MuiDrawer-paper': {
                      width: 240,
                      boxSizing: 'border-box'
                  }
              }}
          >
              <Typography variant='h6' sx={{ padding: '16px', textAlign: 'center' }}>
                  Gerenciamento
              </Typography>
              <MenuItens />
          </Drawer>

          <Box component="main" sx={{ flexGrow: 1, padding: 5, marginLeft: '240px', display: 'flex', justifyContent: 'center' }}>
              <Container maxWidth="lg">{children}</Container>
          </Box>
      </Box>
  )
}

export default SidebarLayout