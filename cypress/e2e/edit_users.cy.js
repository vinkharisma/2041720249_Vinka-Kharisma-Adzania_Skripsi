describe('Edit Users', () => {
    it('PPIC can edit the user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get(':nth-child(2) > .has-dropdown').click()
        cy.get('.active > .dropdown-menu > li > .nav-link').click()
        cy.get(':nth-child(6) > .text-center > .d-flex > .btn-info').click()

        cy.get("input[name=name]").clear();
        cy.get('input[name=name]').type('Test PPIC')
        cy.get("input[name=email]").clear();
        cy.get('input[name=email]').type('testppic1@gmail.com')
        cy.get("input[name=no_pegawai]").clear();
        cy.get('input[name=no_pegawai]').type('T25')
        cy.get("input[name=departemen]").clear();
        cy.get('input[name=departemen]').type('IT')
        cy.get("input[name=no_hp]").clear();
        cy.get('input[name=no_hp]').type('081234567890')

        cy.get('button').contains('Submit').click()
    })

    it('VP can edit the user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get(':nth-child(2) > .has-dropdown').click()
        cy.get('.active > .dropdown-menu > li > .nav-link').click()

        cy.get(':nth-child(5) > .text-center > .d-flex > .btn-info').click()

        cy.get("input[name=name]").clear();
        cy.get('input[name=name]').type('Test VP')
        cy.get("input[name=email]").clear();
        cy.get('input[name=email]').type('testvp1@gmail.com')
        cy.get("input[name=no_pegawai]").clear();
        cy.get('input[name=no_pegawai]').type('T25')
        cy.get("input[name=departemen]").clear();
        cy.get('input[name=departemen]').type('IT')
        cy.get("input[name=no_hp]").clear();
        cy.get('input[name=no_hp]').type('081234567890')

        cy.get('button').contains('Submit').click()
    })
})
