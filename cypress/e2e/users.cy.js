describe('Users Management', () => {
    it('PPIC can open the user page', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Users Management').click()
        cy.get('a').contains('User List').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')
    })

    it('PPIC can create a user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Users Management').click()
        cy.get('a').contains('User List').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')

        cy.get('a').contains('Create New User').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user/create')

        cy.get('input[name=name]').type('Test PPIC')
        cy.get('input[name=email]').type('testppic@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('input[name=no_pegawai]').type('T24')
        cy.get('input[name=departemen]').type('Pergudangan')
        cy.get('input[name=no_hp]').type('08123456789')

        cy.get('button').contains('Submit').click()
    })

    it('PPIC can edit the user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Users Management').click()
        cy.get('a').contains('User List').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')

        cy.get(':nth-child(5) > .text-center > .d-flex > .btn-info').click()

        cy.get("input[name=name]").clear();
        cy.get('input[name=name]').type('Test PPIC Edit')
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

    it('PPIC can delete the user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Users Management').click()
        cy.get('a').contains('User List').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')

        cy.get(':nth-child(5) > .text-center > .d-flex > .ml-2 > .btn').click()
        cy.get('button').contains('OK').click()
    })

    it('PPIC can search the user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Users Management').click()
        cy.get('a').contains('User List').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')

        cy.get('a').contains('Search User').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')

        cy.get('input[name=name]').type('Vice')

        cy.get('button').contains('Submit').click()
    })

    it('VP can open the user page', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Users Management').click()
        cy.get('a').contains('User List').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')
    })

    it('VP can create a user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Users Management').click()
        cy.get('a').contains('User List').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')

        cy.get('a').contains('Create New User').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user/create')

        cy.get('input[name=name]').type('Test VP')
        cy.get('input[name=email]').type('testvp@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('input[name=no_pegawai]').type('T24')
        cy.get('input[name=departemen]').type('Pergudangan')
        cy.get('input[name=no_hp]').type('08123456789')

        cy.get('button').contains('Submit').click()
    })

    it('VP can edit the user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Users Management').click()
        cy.get('a').contains('User List').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')

        cy.get(':nth-child(5) > .text-center > .d-flex > .btn-info').click()

        cy.get("input[name=name]").clear();
        cy.get('input[name=name]').type('Test VP Edit')
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

    it('VP can delete the user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Users Management').click()
        cy.get('a').contains('User List').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')

        cy.get(':nth-child(5) > .text-center > .d-flex > .ml-2 > .btn').click()
        cy.get('button').contains('OK').click()
    })

    it('VP can search the user', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Users Management').click()
        cy.get('a').contains('User List').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')

        cy.get('a').contains('Search User').click()
        cy.url().should('contain', 'http://localhost:8000/user-management/user')

        cy.get('input[name=name]').type('Vice')

        cy.get('button').contains('Submit').click()
    })
})
