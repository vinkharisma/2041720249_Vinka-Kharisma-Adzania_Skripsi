describe('Create Users', () => {
    it('PPIC can create a user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get(':nth-child(2) > .has-dropdown').click()
        cy.get('.active > .dropdown-menu > li > .nav-link').click()

        cy.get('.card-header-action > .btn-icon').click()

        cy.get('input[name=name]').type('Test PPIC')
        cy.get('input[name=email]').type('testppic@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('input[name=no_pegawai]').type('T24')
        cy.get('input[name=departemen]').type('Pergudangan')
        cy.get('input[name=no_hp]').type('08123456789')

        cy.get('button').contains('Submit').click()
    })

    it('VP can create a user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get(':nth-child(2) > .has-dropdown').click()
        cy.get('.active > .dropdown-menu > li > .nav-link').click()

        cy.get('.card-header-action > .btn-icon').click()

        cy.get('input[name=name]').type('Test VP')
        cy.get('input[name=email]').type('testvp@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('input[name=no_pegawai]').type('T24')
        cy.get('input[name=departemen]').type('Pergudangan')
        cy.get('input[name=no_hp]').type('08123456789')

        cy.get('button').contains('Submit').click()
    })
})
