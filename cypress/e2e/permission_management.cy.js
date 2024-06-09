describe('PPIC - Permission Management', () => {
    it('PPIC can open the permission page', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Role Management').click()
        cy.get('a').contains('Permission List').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/permission')
    })
})

describe('PPIC - Search Permission List', () => {
    it('PPIC can search the permission', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Role Management').click()
        cy.get('a').contains('Permission List').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/permission')

        cy.get('a').contains('Search Permission').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/permission')

        cy.get('input[name=name]').type('management')

        cy.get('button').contains('Submit').click()
    })
})

describe('PPIC - CRUD Permission List', () => {
    it('PPIC can create a permission', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Role Management').click()
        cy.get('a').contains('Permission List').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/permission')

        cy.get('a').contains('Create New Permission').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/permission/create')

        cy.get('input[name=name]').type('Test')

        cy.get('button').contains('Submit').click()
    })

    it('PPIC can edit the permission', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Role Management').click()
        cy.get('a').contains('Permission List').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/permission')

        cy.get(':nth-child(7) > .page-link').click()

        cy.get(':nth-child(3) > .text-center > .d-flex > .btn-info').click()

        cy.get("input[name=name]").clear();
        cy.get('input[name=name]').type('test')

        cy.get('button').contains('Submit').click()
    })

    it('PPIC can delete the permission', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Role Management').click()
        cy.get('a').contains('Permission List').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/permission')

        cy.get(':nth-child(7) > .page-link').click()

        cy.get('button').contains('Delete').click()
        cy.get('button').contains('OK').click()
    })
})
