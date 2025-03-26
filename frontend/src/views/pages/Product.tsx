'use client'

import { useEffect, useState } from 'react'
import axiosInstance from '@/utils/axiosInstance'
import { useRouter } from 'next/navigation'

// MUI Imports
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
import MenuItem from '@mui/material/MenuItem'
import Select from '@mui/material/Select'

const Product = () => {
  const [products, setProducts] = useState([])
  const [categories, setCategories] = useState([])
  const [nomeProduto, setNomeProduto] = useState('')
  const [valorProduto, setValorProduto] = useState('')
  const [categoriaProduto, setCategoriaProduto] = useState('')
  const [editingId, setEditingId] = useState(null)
  const router = useRouter()

  useEffect(() => {
    fetchProducts()
    fetchCategories()
  }, [])

  const fetchProducts = async () => {
    try {
      const response = await axiosInstance.get('/products')
      setProducts(response.data)
    } catch (error) {
      console.error('Erro ao buscar produtos:', error)
    }
  }

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
      const payload = {
        nome_produto: nomeProduto,
        valor_produto: parseFloat(valorProduto),
        id_categoria_produto: parseInt(categoriaProduto)
      }

      if (editingId) {
        await axiosInstance.put(`/products/${editingId}`, payload)
      } else {
        await axiosInstance.post('/products', payload)
      }
      setNomeProduto('')
      setValorProduto('')
      setCategoriaProduto('')
      setEditingId(null)
      fetchProducts()
    } catch (error) {
      console.error('Erro ao salvar produto:', error)
    }
  }

  const handleEdit = (product) => {
    setNomeProduto(product.nome_produto)
    setValorProduto(product.valor_produto)
    setCategoriaProduto(product.id_categoria_produto)
    setEditingId(product.id_produto)
  }

  const handleDelete = async (id) => {
    try {
      await axiosInstance.delete(`/products/${id}`)
      fetchProducts()
    } catch (error) {
      console.error('Erro ao excluir produto:', error)
    }
  }

  return (
      <div className='flex flex-col items-center p-6'>
        <Card className='w-full max-w-3xl'>
          <CardContent>
            <Typography variant='h4' className='mb-4'>Gerenciar Produtos</Typography>
            <div className='flex gap-4 mb-4'>
              <TextField
                  fullWidth
                  label='Nome do Produto'
                  value={nomeProduto}
                  onChange={(e) => setNomeProduto(e.target.value)}
              />
              <TextField
                  fullWidth
                  label='Valor do Produto'
                  type='number'
                  value={valorProduto}
                  onChange={(e) => setValorProduto(e.target.value)}
              />
              <Select
                  fullWidth
                  value={categoriaProduto}
                  onChange={(e) => setCategoriaProduto(e.target.value)}
                  displayEmpty
              >
                <MenuItem value='' disabled>Selecione uma Categoria</MenuItem>
                {categories.map((category) => (
                    <MenuItem key={category.id_categoria_planejamento} value={category.id_categoria_planejamento}>
                      {category.nome_categoria}
                    </MenuItem>
                ))}
              </Select>
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
                    <TableCell>Valor</TableCell>
                    <TableCell>Categoria</TableCell>
                    <TableCell>Ações</TableCell>
                  </TableRow>
                </TableHead>
                <TableBody>
                  {products.map((product) => (
                      <TableRow key={product.id_produto}>
                        <TableCell>{product.id_produto}</TableCell>
                        <TableCell>{product.nome_produto}</TableCell>
                        <TableCell>{product.valor_produto}</TableCell>
                        <TableCell>{categories.find(cat => cat.id_categoria_planejamento === product.id_categoria_produto)?.nome_categoria || 'N/A'}</TableCell>
                        <TableCell>
                          <Button variant='outlined' color='primary' size='small' onClick={() => handleEdit(product)}>
                            Editar
                          </Button>
                          <Button
                              variant='outlined'
                              color='error'
                              size='small'
                              onClick={() => handleDelete(product.id_produto)}
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

export default Product