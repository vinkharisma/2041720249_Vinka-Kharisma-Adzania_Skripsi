describe('PPIC - Role Management', () => {
    it('PPIC can open the role page', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Role Management').click()
        cy.get('a').contains('Role List').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/role')
    })
})

describe('PPIC - Search Role List', () => {
    it('PPIC can search the role', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Role Management').click()
        cy.get('a').contains('Role List').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/role')

        cy.get('a').contains('Search Role').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/role')

        cy.get('input[name=name]').type('admin')

        cy.get('button').contains('Submit').click()
    })
})

describe('PPIC - CRUD Role List', () => {
    it('PPIC can create a role', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Role Management').click()
        cy.get('a').contains('Role List').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/role')

        cy.get('a').contains('Create New Role').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/role/create')

        cy.get('input[name=name]').type('Test')

        cy.get('button').contains('Submit').click()
    })

    it('PPIC can edit the role', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Role Management').click()
        cy.get('a').contains('Role List').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/role')

        cy.get(':nth-child(5) > .text-center > .d-flex > .btn-info').click()

        cy.get("input[name=name]").clear();
        cy.get('input[name=name]').type('test')

        cy.get('button').contains('Submit').click()
    })

    it('PPIC can delete the role', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Role Management').click()
        cy.get('a').contains('Role List').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/role')

        cy.get('button').contains('Delete').click()
        cy.get('button').contains('OK').click()
    })
})
