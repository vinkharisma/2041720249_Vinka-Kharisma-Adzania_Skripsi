describe('PPIC can delete the user', () => {
    it('passes', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get(':nth-child(2) > .has-dropdown').click()
        cy.get('.active > .dropdown-menu > li > .nav-link').click()

        cy.get(':nth-child(6) > .text-center > .d-flex > .ml-2 > .btn').click()
        cy.get('button').contains('OK').click()
    })

    it('VP can delete the user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get(':nth-child(2) > .has-dropdown').click()
        cy.get('.active > .dropdown-menu > li > .nav-link').click()

        cy.get(':nth-child(5) > .text-center > .d-flex > .ml-2 > .btn').click()
        cy.get('button').contains('OK').click()
    })
})
