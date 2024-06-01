describe('Profiles', () => {
    it('PPIC can open the profile', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-right > :nth-child(3) > .nav-link').click()
        cy.get('a').contains('Profile').click()
        cy.url().should('contain', 'http://localhost:8000/profile')
    })

    it('VP can open the profile', () => {
        cy.visit('http://localhost:8000/dashboard')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.navbar-right > :nth-child(3) > .nav-link').click()
        cy.get('a').contains('Profile').click()
        cy.url().should('contain', 'http://localhost:8000/profile')
    })
})
