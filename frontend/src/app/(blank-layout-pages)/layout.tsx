// Type Imports
import type { ChildrenType } from '@core/types'

// Component Imports
import BlankLayout from '@layouts/BlankLayout'

const Layout = ({ children }: ChildrenType) => {
  // Vars
  const direction = 'ltr'

  return (
    <BlankLayout>{children}</BlankLayout>
  )
}

export default Layout
