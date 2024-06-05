describe('Menu Item Management', () => {
    it('PPIC can open the menu item page', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Menu Management').click()
        cy.get('a').contains('Menu Item').click()
        cy.url().should('contain', 'http://localhost:8000/menu-management/menu-item')
    })

    it('PPIC can search the menu item', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Menu Management').click()
        cy.get('a').contains('Menu Item').click()
        cy.url().should('contain', 'http://localhost:8000/menu-management/menu-item')

        cy.get('a').contains('Search Menu Item').click()
        cy.url().should('contain', 'http://localhost:8000/menu-management/menu-item')

        cy.get('input[name=name]').type('dashboard')

        cy.get('button').contains('Submit').click()
    })
})
