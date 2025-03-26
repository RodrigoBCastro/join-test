// Next Imports
import Link from 'next/link'

// MUI Imports
import IconButton from '@mui/material/IconButton'

// Third-party Imports
import classnames from 'classnames'

// Component Imports
import NavToggle from './NavToggle'
import NavSearch from '@components/layout/shared/search'
import ModeDropdown from '@components/layout/shared/ModeDropdown'
import UserDropdown from '@components/layout/shared/UserDropdown'

// Util Imports
import { verticalLayoutClasses } from '@layouts/utils/layoutClasses'
import GitHubIcon from "@components/icons/GitHubIcon";
import LinkedinIcon from "@components/icons/LinkedinIcon";

const NavbarContent = () => {
  return (
    <div className={classnames(verticalLayoutClasses.navbarContent, 'flex items-center justify-between gap-4 is-full')}>
      <div className='flex items-center gap-2 sm:gap-4'>
        <NavToggle />
      </div>
      <div className='flex items-center'>
        <Link
          className='flex mie-2'
          href={`https://github.com/RodrigoBCastro`}
          target='_blank'
        >
            <GitHubIcon color="#000" />
        </Link>
        <Link
          className='flex mie-2'
          href={`https://www.linkedin.com/in/rodrigobragacastro/`}
          target='_blank'
        >
            <LinkedinIcon color="#000" />
        </Link>
        <ModeDropdown />
      </div>
    </div>
  )
}

export default NavbarContent
