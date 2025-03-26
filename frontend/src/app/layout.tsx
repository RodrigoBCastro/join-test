import SidebarLayout from "@components/SideBarLayout";
import VerticalMenu from "@menu/vertical-menu";
// Third-party Imports
import 'react-perfect-scrollbar/dist/css/styles.css'

// Type Imports
import type { ChildrenType } from '@core/types'

// Style Imports
import '@/app/globals.css'

// Generated Icon CSS Imports
import '@assets/iconify-icons/generated-icons.css'
import Providers from "@components/Providers";
import VerticalLayout from "@layouts/VerticalLayout";
import Navigation from "@components/layout/vertical/Navigation";
import Navbar from "@components/layout/vertical/Navbar";
import LayoutWrapper from "@layouts/LayoutWrapper";
import VerticalFooter from "@components/layout/vertical/Footer";

export const metadata = {
  title: 'Demo: Materio - NextJS Dashboard Free',
  description:
    'Develop next-level web apps with Materio Dashboard Free - NextJS. Now, updated with lightning-fast routing powered by MUI and App router.'
}

const RootLayout = ({ children }: ChildrenType) => {
  const direction = 'ltr'

  return (
    <html id='__next' dir={direction}>
      <body className='flex is-full min-bs-full flex-auto flex-col'>
      <Providers direction={direction}>
          <LayoutWrapper
              verticalLayout={
                  <VerticalLayout navigation={<Navigation />} navbar={<Navbar />} footer={<VerticalFooter />}>
                      {children}
                  </VerticalLayout>
              }
          />
      </Providers>
      </body>
    </html>
  )
}

export default RootLayout
