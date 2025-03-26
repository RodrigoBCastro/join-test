'use client'

import { useEffect, useState } from 'react'
import axiosInstance from '@/utils/axiosInstance'
import { useRouter } from 'next/navigation'

import Card from '@mui/material/Card'
import CardContent from '@mui/material/CardContent'
import Typography from '@mui/material/Typography'
import TextField from '@mui/material/TextField'
import Button from '@mui/material/Button'
import Table from '@mui/material/Table'
import TableBody from '@mui/material/TableBody'
import TableCell from '@mui/material/TableCell'
import TableContainer from '@mui/material/TableContainer'
import TableHead from '@mui/material/TableHead'
import TableRow from '@mui/material/TableRow'
import Paper from '@mui/material/Paper'

const Category = () => {
  const [categories, setCategories] = useState([])
  const [nomeCategoria, setNomeCategoria] = useState('')
  const [editingId, setEditingId] = useState(null)
  const router = useRouter()

  useEffect(() => {
    fetchCategories()
  }, [])

  const fetchCategories = async () => {
    try {
      const response = await axiosInstance.get('/categories')
      setCategories(response.data)
    } catch (error) {
      console.error('Erro ao buscar categorias:', error)
    }
  }

  const handleCreateOrUpdate = async () => {
    try {
      if (editingId) {
        await axiosInstance.put(`/categories/${editingId}`, { nome_categoria: nomeCategoria })
      } else {
        await axiosInstance.post('/categories', { nome_categoria: nomeCategoria })
      }
      setNomeCategoria('')
      setEditingId(null)
      fetchCategories()
    } catch (error) {
      console.error('Erro ao salvar categoria:', error)
    }
  }

  const handleEdit = (category) => {
    setNomeCategoria(category.nome_categoria)
    setEditingId(category.id_categoria_planejamento)
  }

  const handleDelete = async (id) => {
    try {
      await axiosInstance.delete(`/categories/${id}`)
      fetchCategories()
    } catch (error) {
      console.error('Erro ao excluir categoria:', error)
    }
  }

  return (
      <div className='flex flex-col items-center p-6'>
        <Card className='w-full max-w-3xl'>
          <CardContent>
            <Typography variant='h4' className='mb-4'>Gerenciar Categorias</Typography>
            <div className='flex gap-4 mb-4'>
              <TextField
                  fullWidth
                  label='Nome da Categoria'
                  value={nomeCategoria}
                  onChange={(e) => setNomeCategoria(e.target.value)}
              />
              <Button variant='contained' color='primary' onClick={handleCreateOrUpdate}>
                {editingId ? 'Atualizar' : 'Criar'}
              </Button>
            </div>
            <TableContainer component={Paper}>
              <Table>
                <TableHead>
                  <TableRow>
                    <TableCell>ID</TableCell>
                    <TableCell>Nome</TableCell>
                    <TableCell>Ações</TableCell>
                  </TableRow>
                </TableHead>
                <TableBody>
                  {categories.map((category) => (
                      <TableRow key={category.id_categoria_planejamento}>
                        <TableCell>{category.id_categoria_planejamento}</TableCell>
                        <TableCell>{category.nome_categoria}</TableCell>
                        <TableCell>
                          <Button variant='outlined' color='primary' size='small' onClick={() => handleEdit(category)}>
                            Editar
                          </Button>
                          <Button
                              variant='outlined'
                              color='error'
                              size='small'
                              onClick={() => handleDelete(category.id_categoria_planejamento)}
                              style={{ marginLeft: '8px' }}
                          >
                            Excluir
                          </Button>
                        </TableCell>
                      </TableRow>
                  ))}
                </TableBody>
              </Table>
            </TableContainer>
          </CardContent>
        </Card>
      </div>
  )
}

export default Category
