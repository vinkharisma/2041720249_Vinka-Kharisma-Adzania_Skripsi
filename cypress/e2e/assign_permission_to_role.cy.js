describe('Assign Permission To Role', () => {
    it('PPIC can open the assign permission to role page', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Role Management').click()
        cy.get('a').contains('Permission To Role').click()
        cy.url().should('contain', 'http://localhost:8000/role-and-permission/assign')
    })
})
